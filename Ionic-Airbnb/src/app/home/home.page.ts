import { Component } from '@angular/core';

import { FormBuilder, FormGroup, Validators } from '@angular/forms';

import { AuthService } from '../services/auth.service';

@Component({
    selector: 'app-home',
    templateUrl: 'home.page.html',
    styleUrls: ['home.page.scss'],
})
export class HomePage {

    loginForm: FormGroup;

    constructor(public formbuilder: FormBuilder, public authService: AuthService) {
        this.loginForm = this.formbuilder.group({
            email: ['', [Validators.required]],
            password: ['', [Validators.required]],
        });
    }

    logarUsuario(form) {

        if (form.status == "VALID") {
            this.authService.logarUsuario(form.value).subscribe(
                (res) => {
                    console.log(res);
                });
        }
    }
}
