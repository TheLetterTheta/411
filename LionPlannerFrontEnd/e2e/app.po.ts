import { browser, element, by } from 'protractor';

export class LionPlannerPage {
  navigateTo() {
    return browser.get('/');
  }

  getParagraphText() {
    return element(by.css('lion-root h1')).getText();
  }
}
