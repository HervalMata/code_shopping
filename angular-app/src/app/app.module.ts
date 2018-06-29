import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { LoginComponent } from './components/pages/login/login.component';
import { CategoryListComponent } from './components/pages/category/category-list/category-list.component';

import {FormsModule} from "@angular/forms";
import {RouterModule, Routes} from '@angular/router';
import {HttpClientModule} from "@angular/common/http";


const routes: Routes = [
    {
      path: 'login', component: LoginComponent
    },
    {
      path: 'categories/list', component: CategoryListComponent
    },
    { // definindo o login como padrão se estiver vasio
      path: '',
        redirectTo: '/login',
        pathMatch: 'full'
    }
]

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    CategoryListComponent
  ],
  imports: [
    BrowserModule,
      FormsModule,
      HttpClientModule,
      RouterModule.forRoot(routes, {enableTracing: true})
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
