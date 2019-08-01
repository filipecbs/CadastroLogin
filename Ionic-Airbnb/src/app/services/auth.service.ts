import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
    providedIn: 'root'
})

export class AuthService {

    apiUrl: string = "http://localhost:8000/api/";

    httpHeaders: any = {
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
    }

    constructor(public http: HttpClient) { }

    registrarUsuario(form): Observable<any> {
        return this.http.post(this.apiUrl + 'register', form);
    }

    logarUsuario(form): Observable<any> {
        return this.http.post(this.apiUrl + 'login', form);
    }

}
