import { Component, OnInit } from '@angular/core';

declare var $: any;

@Component({
  selector: 'lion-side-navbar',
  templateUrl: 'side-navbar.component.html',
  styles: []
})
export class SideNavbarComponent {

  constructor() { }

  closeNav() {
    $('.button-collapse').sideNav('hide');
  }
}
