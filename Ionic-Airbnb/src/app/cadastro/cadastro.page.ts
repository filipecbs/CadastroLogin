import { Component, OnInit } from '@angular/core';

import { FormBuilder, FormGroup, Validators } from '@angular/forms';

import { AuthService } from '../services/auth.service';

@Component({
    selector: 'app-cadastro',
    templateUrl: './cadastro.page.html',
    styleUrls: ['./cadastro.page.scss'],
})

export class CadastroPage implements OnInit {

    registerForm: FormGroup;

    constructor(public formbuilder: FormBuilder, public authService: AuthService) {
        this.registerForm = this.formbuilder.group({
            name: ['', [Validators.required]],
            email: ['', [Validators.required]],
            password: ['', [Validators.required]],
            c_password: ['', [Validators.required]],
        });
    }

    ngOnInit() {
    }

    registrarUsuario(form) {
        console.log(form);
        if (form.status == "VALID") {
            console.log(form.value);
            this.authService.registrarUsuario(form.value).subscribe(
                (res) => {
                    console.log(res);
                });
        }
    }

}
