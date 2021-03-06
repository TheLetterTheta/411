import { Component, OnInit, AfterViewInit } from '@angular/core';

declare var google: any;

@Component({
  selector: 'lion-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.css']
})
export class ContactComponent implements AfterViewInit {

  private submitted: boolean = false;

  constructor() {

  }
  private map: any;

  ngAfterViewInit() {
    var var_location = new google.maps.LatLng(30.514823, -90.466531);

    var var_mapoptions = {
      center: var_location,

      zoom: 16
    };

    var var_marker = new google.maps.Marker({
      position: var_location,
      map: var_map,
      title: "Hammond"
    });

    var var_map = new google.maps.Map(document.getElementById("map-container"),
      var_mapoptions);

    var_marker.setMap(var_map);

  }

  onMapClick() {
      // If it's an iPhone..
      if( (navigator.platform.indexOf("iPhone") != -1)
          || (navigator.platform.indexOf("iPod") != -1)
          || (navigator.platform.indexOf("iPad") != -1))
        window.open("maps://maps.google.com/maps?daddr=30.514823,-90.466531&amp;ll=");
      else
        window.open("http://maps.google.com/maps?daddr=30.514823,-90.466531&amp;ll=");

  }

  onSubmit() {
    this.submitted = true;
    setTimeout(() => {
      this.submitted = false;
    }, 2000);
  }
}
