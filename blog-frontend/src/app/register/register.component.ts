import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  signup_form :FormGroup;
  formData :any={};

  constructor(private http:HttpClient) { }

  ngOnInit(): void {
    this.signup_form= new FormGroup({
      Firstname:new FormControl('',[Validators.required]),
      Lastname:new FormControl('',[Validators.required]),
      DOB:new FormControl('',[Validators.required]),
      role:new FormControl('',[Validators.required]),
      Email:new FormControl('',[Validators.required]),
      Password:new FormControl('',[Validators.required])
    })
  }

  submit(signup_form:FormGroup){
    console.log(this.signup_form.value);
    this.formData={
      Firstname:this.signup_form.value.Firstname,
      Lastname:this.signup_form.value.Lastname,
      DOB:this.signup_form.value.DOB,
      role:this.signup_form.value.role,
      Email:this.signup_form.value.Email,
      Password:this.signup_form.value.Password
    }
    this.http.post('http://localhost/projects/blog-crud/blog-backend/public/api/register',this.formData).subscribe((data)=>alert(data['message']));
  }
}
