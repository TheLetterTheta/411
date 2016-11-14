import {Component, OnInit, AfterViewInit} from '@angular/core';
import {User} from "../../../shared/Models/User";
import {UserService} from "../../Login/user.service";

declare var $: any;

@Component({
  selector: 'lion-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent {

  private percentComplete: number;
  private numCredits: number;
  private _user: User;
  private isLoading: boolean = true;

  constructor(private _userService: UserService) {
    this.numCredits = 90;
    this.percentComplete = this.numCredits / 120 * 100;
    _userService.GetUserProfile().subscribe(user => {
      this._user = user;
      console.log(user);
      this.isLoading = false;
      this.enablePieChart();
    });
  }

  enablePieChart() {


    $(function() {
      // instantiate the plugin
      $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });
      // update
      var percentage = $('#percentage').val();
      $('.min-chart').data('easyPieChart').update(percentage);
    });
  }
}
