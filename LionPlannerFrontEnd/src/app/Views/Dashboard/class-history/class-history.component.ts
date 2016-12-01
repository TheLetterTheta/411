import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'lion-class-history',
  templateUrl: './class-history.component.html',
  styleUrls: ['./class-history.component.css']
})
export class ClassHistoryComponent {

  private loading: boolean = true;

  constructor() { }

  ngAfterViewInit() {
    setTimeout(() => {
      this.loading = false;
    }, 2000);
  }

}
