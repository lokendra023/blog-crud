import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.css']
})
export class SigninComponent implements OnInit {

  signin_form :FormGroup;
  constructor() { }

  ngOnInit(): void {
    this.signin_form= new FormGroup({
      Email:new FormControl('',[Validators.required]),
      Password:new FormControl('',[Validators.required])
    })
  }

  get fdata(){
    return this.signin_form.controls;
  }

  submit(signin_form:FormGroup){
    console.log(this.signin_form.value);
  }
}
