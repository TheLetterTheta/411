import { Component } from '@angular/core';

declare var $: any;

@Component({
  selector: 'lion-root',
  template: `
      <router-outlet></router-outlet>
`
})
export class AppComponent {

  constructor() {
  }

}
