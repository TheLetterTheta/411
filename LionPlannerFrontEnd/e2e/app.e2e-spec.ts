import { LionPlannerPage } from './app.po';

describe('lion-planner App', function() {
  let page: LionPlannerPage;

  beforeEach(() => {
    page = new LionPlannerPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('lion works!');
  });
});
