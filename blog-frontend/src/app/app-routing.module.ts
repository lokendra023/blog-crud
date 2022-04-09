import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AdminComponent } from './private/blog/admin/admin.component';
import { BlogComponent } from './private/blog/blog.component';
import { UserComponent } from './private/blog/user/user.component';
import { RegisterComponent } from './register/register.component';
import { SigninComponent } from './signin/signin.component';

const routes: Routes = [
  {path:'register',component:RegisterComponent},
  {path:'signin',component:SigninComponent},
  {path:'internal/admin/dashboard',component:AdminComponent},
  {path:'internal/user/dashboard',component:UserComponent},
  {path:'internal/blogs',component:BlogComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
