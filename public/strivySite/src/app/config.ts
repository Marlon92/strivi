import { Injectable } from '@angular/core';
@Injectable()
export class Config {

    public static get API_ENDPOINT(): string { return 'http://192.168.156.132:8887/strivi/public/api/'; }
    public static get API_ENDPOINT_MAIN(): string { return 'http://192.168.156.132:8887/'; }

    /*public static get API_ENDPOINT(): string { return 'https://www.cpxboxpro.com:8088/api/'; }
    public static get API_ENDPOINT_MAIN(): string { return 'https://www.cpxboxpro.com:8088/'; }
    public static get API_ENDPOINT_PRINT(): string { return 'https://miami.cpslogistics.com:8586/api/'; }*/
}

