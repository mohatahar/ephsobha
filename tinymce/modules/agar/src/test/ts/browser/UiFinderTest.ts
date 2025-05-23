import { afterEach, Assert, beforeEach, describe, it, UnitTest } from '@ephox/bedrock-client';
import { Testable } from '@ephox/dispute';
import { Class, Css, Hierarchy, Html, Insert, Remove, SugarElement, SugarNode } from '@ephox/sugar';

import * as Assertions from 'ephox/agar/api/Assertions';
import { Chain } from 'ephox/agar/api/Chain';
import { Pipeline } from 'ephox/agar/api/Pipeline';
import { Step } from 'ephox/agar/api/Step';
import * as UiFinder from 'ephox/agar/api/UiFinder';

UnitTest.asynctest('UiFinderTest', (success, failure) => {

  const container = SugarElement.fromHtml(
    '<div>' +
    '<p>this is something <strong>bold</strong> here</p>' +
    '<p>there is something else here</p>' +
    '</div>'
  );
  Insert.append(SugarElement.fromDom(document.body), container);

  const teardown = () => {
    Remove.remove(container);
  };

  Pipeline.async({}, [
    UiFinder.sNotExists(container, 'em'),
    UiFinder.sExists(container, 'strong'),

    Chain.asStep(container, [
      UiFinder.cNotExists('em'),
      UiFinder.cExists('strong'),
      UiFinder.cFindIn('strong'),
      Chain.op((strong) => {
        Assertions.assertEq('Checking contents of strong tag', 'bold', Html.get(strong));
      }),

      Chain.inject(container),
      UiFinder.cFindAllIn('strong'),
      Chain.op((strongs) => {
        Assertions.assertEq('Should only find 1 strong', 1, strongs.length);
      }),

      Chain.inject(container),
      UiFinder.cFindAllIn('p'),
      Chain.op((ps) => {
        Assertions.assertEq('Should find two paragraphs', 2, ps.length);
        Assertions.assertEq('Should be sugared paragraphs', 'p', SugarNode.name(ps[0]));
      })
    ]),

    Step.sync(() => {
      const result = UiFinder.findIn(container, 'strong').getOrDie();
      Assertions.assertDomEq(
        'Checking findIn',
        Hierarchy.follow(container, [ 0, 1 ]).getOrDie('Invalid test data'),
        result
      );
    }),

    Step.sync(() => {
      const result = UiFinder.findAllIn(container, 'p');
      Assertions.assertEq('Checking findAllIn length', 2, result.length);
    }),

    Chain.asStep(container, [
      UiFinder.cFindIn('strong'),
      Chain.op((strong) => {
        // Intentionally not waiting before calling next.
        Css.set(strong, 'display', 'none');
        setTimeout(() => {
          Css.remove(strong, 'display');
        }, 200);
      }),

      Chain.inject(container),
      UiFinder.cWaitForVisible('Waiting for the strong tag to reappear', 'strong')
    ]),

    Chain.asStep(container, [
      UiFinder.cFindIn('strong'),
      Chain.op((strong) => {
        // Intentionally not waiting before calling next.
        setTimeout(() => {
          Class.add(strong, 'changing-state');
        }, 50);
      }),

      Chain.inject(container),
      UiFinder.cWaitForState('Waiting for the strong tag to gain class: changing-state', 'strong', (elem) => Class.has(elem, 'changing-state'))
    ]),

    Chain.asStep(container, [
      UiFinder.cFindIn('strong'),
      Chain.op((strong) => {
        // Intentionally not waiting before calling next.
        setTimeout(() => {
          Class.add(strong, 'changing-state-waitfor');
        }, 50);
      }),

      Chain.inject(container),
      UiFinder.cWaitFor('Waiting for the strong tag to gain class: changing-state-waitfor', 'strong.changing-state-waitfor')
    ])
  ], () => {
    teardown();
    success();
  }, failure);
});

describe('UiFinderTest', () => {
  const body = SugarElement.fromDom(document.body);
  let container: SugarElement<HTMLElement>;

  beforeEach(() => {
    container = SugarElement.fromHtml<HTMLElement>('<div class="container"></div>');
    Insert.append(body, container);
  });

  afterEach(() => {
    Remove.remove(container);
  });

  it('Should find target by label', async () => {
    const content = SugarElement.fromHtml(
      '<div>' +
        '<label for="input-width">Width</label>' +
        '<input type="number" id="input-width"></input>' +
      '</div>'
    );
    Insert.append(container, content);
    const input = container.dom.querySelector('#input-width');

    Assert.eq('Should find target by label', input, UiFinder.findTargetByLabel(container, 'Width').getOrDie().dom, Testable.tStrict);
  });

  it('Should find input target by label when input inside label', async () => {
    const content = SugarElement.fromHtml(
      '<label>' +
        'Has Border' +
        '<input type="checkbox" id="has-border"></input>' +
      '</label>'
    );
    Insert.append(container, content);
    const input = container.dom.querySelector('#has-border');

    Assert.eq('Should find input inside label', input, UiFinder.findTargetByLabel(container, 'Has Border').getOrDie().dom, Testable.tStrict);
  });

  it('Should find textarea target by label when textarea inside label', async () => {
    const content = SugarElement.fromHtml(
      '<label>' +
        'Description' +
        '<textarea id="description"></textarea>' +
      '</label>'
    );
    Insert.append(container, content);
    const input = container.dom.querySelector('#description');

    Assert.eq('Should find textarea inside label', input, UiFinder.findTargetByLabel(container, 'Description').getOrDie().dom, Testable.tStrict);
  });

  it('Should match full label', async () => {
    const content = SugarElement.fromHtml(
      '<div>' +
        '<label for="sort-by">Sort by</label>' +
        '<input id="sort-by"></input>' +
        '<label for="sort">Sort</label>' +
        '<input id="sort"></input>' +
      '</div>'
    );
    Insert.append(container, content);
    const sortByInput = container.dom.querySelector('#sort-by');
    const sortInput = container.dom.querySelector('#sort');

    Assert.eq('Should find sortBy', sortByInput, UiFinder.findTargetByLabel(container, 'Sort by').getOrDie().dom, Testable.tStrict);
    Assert.eq('Should find sort', sortInput, UiFinder.findTargetByLabel(container, 'Sort').getOrDie().dom, Testable.tStrict);
  });
});