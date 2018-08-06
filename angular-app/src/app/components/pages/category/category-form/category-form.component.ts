import {ChangeDetectorRef, Component, Input, OnInit} from '@angular/core';
import {FormGroup} from "@angular/forms";

@Component({
  selector: 'category-form',
  templateUrl: './category-form.component.html',
  styleUrls: ['./category-form.component.css']
})
export class CategoryFormComponent implements OnInit {

  @Input()
  form: FormGroup;

  constructor(private ChangeRef: ChangeDetectorRef) {

  }

  ngOnInit() {
  }

  ngOnChanges(){
    // this.ChangeRef.detectChanges();
  }
}
