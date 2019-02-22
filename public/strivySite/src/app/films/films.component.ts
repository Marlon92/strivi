import { Component, OnInit, ElementRef, ViewChild, ChangeDetectorRef } from '@angular/core';
import { Router, RouterModule } from '@angular/router';
import { FormBuilder, FormGroup, Validators, ValidationErrors } from '@angular/forms';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Http, Headers } from '@angular/http';
import { Observable, of } from 'rxjs';
import { ControlService } from '../services/control.service';
import { Globals } from '../shared/Globals';
import 'rxjs/Rx';
import 'rxjs/add/operator/filter/';
import 'rxjs/add/operator/map/';

@Component({
  selector: 'films',
  templateUrl: './films.component.html',
  styleUrls: ['./films.component.css']
})
export class FilmsComponent {

  public model: any;
  public films: any[];

  constructor(public controlService: ControlService, public globals: Globals, private router: Router, private http: Http) {

    this.model = {'name': '', 'email': '', 'password': '', 'password_confirmation': ''};
  }

  ngOnInit() {

    this.controlService.getList('films')
       .subscribe((res) => {
         this.films = res.records;
       });
      }

   public openMovie(item) {
      this.router.navigate(['films/' + item.slug]);
   }
}
