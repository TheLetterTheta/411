import { Component, OnInit } from '@angular/core';

declare var $: any;

@Component({
  selector: 'lion-planner',
  templateUrl: './planner.component.html',
  styleUrls: ['./planner.component.css']
})
export class PlannerComponent implements OnInit {

  constructor() { }

  ngOnInit() {
    $('.rotate-btn').on('click', function () {
      var cardId = $(this).attr('data-card');
      $('#' + cardId).toggleClass('flipped');

    });
  }

}
