class Application {

    static instance = new Application();
    domain = "http://localhost";
    domainLocation = "/A1_Q5/";

    //rsa
    e;
    n;
    d;

    //elgamel
    y;
    x;
    p;
    g;
    k;


    constructor() {}

    generateKeys(){

        let p = document.getElementById("generate_keys_p").valueOf().value;
        let q = document.getElementById("generate_keys_q").valueOf().value;
        let e  = document.getElementById("generate_keys_e").valueOf().value;
        let n = p * q;
        let phi =(p-1) * (q-1);
        let d

        this.mod_invert(phi,e).then(outcome => {
            let response = JSON.parse(outcome);
            d = outcome;
            document.getElementById("generate_keys_d").valueOf().value = d;
            //output to web
            document.getElementById("generate_keys_n").valueOf().value = n;
            document.getElementById("generate_keys_phi").valueOf().value = phi;

            this.n = n;
            this.e = e;
            this.d = d;

        });
    }

    encrypt(){
        let m = document.getElementById("encrypt_m").valueOf().value;
        let c = bigInt(m).modPow(this.e, this.n);
        document.getElementById("encrypt_c").valueOf().value = c;
    }

    decrypt(){
        let c = document.getElementById("dencrypt_c").valueOf().value;
        let m = bigInt(c).modPow(this.d,this.n);
        document.getElementById("decrypt_m").valueOf().value = m;
    }

    generateKeysElGamel(){
        let p = document.getElementById("generate_keys_elgamel_p").valueOf().value;
        let g = document.getElementById("generate_keys_elgamel_g").valueOf().value;
        let x = document.getElementById("generate_keys_elgamel_x").valueOf().value;
        this.r = document.getElementById("generate_keys_elgamel_r").valueOf().value;
        let y = bigInt(g).modPow(x,p);
        console.log("y: "+y);
        document.getElementById("generate_keys_elgamel_y").valueOf().value = y;
        this.p = p;
        this.x = x;
        this.g = document.getElementById("generate_keys_elgamel_g").valueOf().value;
        this.k  = bigInt(y).modPow(this.r,p);
        document.getElementById("generate_keys_elgamel_k").valueOf().value = this.k;

    }

    encryptElGamel(){
        let m = document.getElementById("encrypt_elgamel_m").valueOf().value;
        let c2= bigInt(m*this.k).mod(this.p);
        let c1= bigInt(this.g).modPow(this.r,this.p);
        document.getElementById("encrypt_elgamel_c1").valueOf().value = c1;
        document.getElementById("encrypt_elgamel_c2").valueOf().value = c2;
    }

    decryptElGamel(){
        let c1 =  document.getElementById("decrypt_elgamel_c1").valueOf().value;
        let c2 = document.getElementById("decrypt_elgamel_c2").valueOf().value;
        let k = bigInt(c1).modPow(this.x, this.p);
        let inverse = bigInt(k).modInv(this.p);
        let m = bigInt(inverse*c2).mod(this.p);
        document.getElementById("decrypt_elgamel_m").valueOf().value = m;
    }


    mod_invert(number, modulo){
        return fetch(this.domain+this.domainLocation+"mod_invert.php?modulo="+modulo+"&number="+number,{
            method: 'get',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            }
        }).then(async function (response) {
            return await response.text();
        }).then(outcome => {
            let response = JSON.parse(outcome);
            return response.output;
        })
    }

    
}