import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { CustomMaterialModule } from "./material.module";
import { BrowserAnimationsModule } from "@angular/platform-browser/animations";
import { AppRoutingModule } from "./app.routing";
import { AppFilmRoutingModule } from './app.filmRouting';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MatInputModule } from '@angular/material';
import { HttpClientModule } from '@angular/common/http';
import { HttpModule } from '@angular/http';
import { ControlService } from './services/control.service';
import { LoginComponent } from './login/login.component';
import { LogoutComponent } from './login/logout.component';
import { RegisterComponent } from './register/register.component';
import { Globals } from './shared/Globals';
import { FilmsComponent } from './films/films.component';
import { FilmDetailsComponent } from './filmDetails/filmDetails.component';
import { CreateFilmComponent } from './createFilm/createFilm.component';
import { FlexLayoutModule } from '@angular/flex-layout';
import { FileDropModule } from 'ngx-file-drop';
import { StarRatingModule } from 'angular-star-rating';
import { Routes, RouterModule } from '@angular/router';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    LogoutComponent,
    RegisterComponent,
    FilmsComponent,
    FilmDetailsComponent,
    CreateFilmComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    CustomMaterialModule,
    AppRoutingModule,
    AppFilmRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    MatInputModule,
    HttpClientModule,
    HttpModule,
    FlexLayoutModule,
    FileDropModule,
    StarRatingModule.forRoot(),
  ],
  providers: [ControlService, Globals],
  bootstrap: [AppComponent]
})
export class AppModule { }
