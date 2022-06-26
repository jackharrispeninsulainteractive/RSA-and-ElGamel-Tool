<?php
/**
 * Copyright Jack Harris
 * Peninsula Interactive - A1_Q4
 * Last Updated - 23/06/2022
 */
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encryption Tool RSA & ELGamal</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<main>

    <section style="width: 100%">
        <h1 style="text-align: center; padding-bottom: 16px">Encryption Tool RSA & ELGamal</h1>
        <p style="text-align: center">This is a basic tool to test the creation and use of basic RSA keys for RMIT Security in Computing and Information Technology Assignment 1 Question 5</p>
    </section>
    <section style="width: 100%">
        <h1>Generate RSA Encryption Keys</h1>
        <form action="javascript:Application.instance.generateKeys()">
            <label>
                (p) Prime Number 1
                <br>
                <input type="number" id="generate_keys_p" required>
            </label>
            <br>
            <label>
                (q) Prime Number 2
                <br>
                <input type="number" id="generate_keys_q" required>
            </label>
            <br>
            <label>
                (e) Public Exponent
                <br>
                <input type="number" id="generate_keys_e" required>
            </label>
            <br>
            <label>
                (n) Public Key (System Generated)
                <br>
                <input type="number" disabled id="generate_keys_n">
            </label>
            <br>
            <label>
                (φn) Phi of N (System Generated)
                <br>
                <input type="number" disabled id="generate_keys_phi">
            </label>
            <br>
            <label>
                (d) Private Key (System Generated)
                <br>
                <input type="number" disabled id="generate_keys_d">
            </label>
            <button>Calculate</button>
        </form>
    </section>

    <section>
        <h1>Encrypt (RSA)</h1>
        <p>Encoding: c = m^e mod(n)</p>
        <form action="javascript:Application.instance.encrypt()">
            <label>
                (m) Message
                <br>
                <input type="number" id="encrypt_m" required>
            </label>
            <br>
            <label>
                (c) Encrypted Cipher (System Generated)
                <br>
                <input type="number" disabled id="encrypt_c">
            </label>
            <br>
            <button>Encrypt Message</button>
        </form>
    </section>

    <section>
        <h1>Decrypt (RSA)</h1>
        <p>Decoding: m = c^d mod(n)</p>

        <form action="javascript:Application.instance.decrypt()">
            <label>
                (c) Encrypted Cipher
                <br>
                <input type="number" id="dencrypt_c" required>
            </label>
            <br>
            <label>
                (m) Message System Generated)
                <br>
                <input type="number" disabled id="decrypt_m">
            </label>
            <br>
            <button>Decrypt Message</button>
        </form>
    </section>

    <section style="width: 100%">
        <h1>Generate ElGamal Encryption Keys</h1>
        <form action="javascript:Application.instance.generateKeysElGamel()">
            <label>
                (p)
                <br>
                <input type="number" id="generate_keys_elgamel_p" required>
            </label>
            <br>
            <label>
                (g)
                <br>
                <input type="number" id="generate_keys_elgamel_g" required>
            </label>
            <br>
            <label>
                (x)
                <br>
                <input type="number" id="generate_keys_elgamel_x" required>
            </label>
            <br>
            <label>
                (r)
                <br>
                <input type="number" id="generate_keys_elgamel_r" required>
            </label>
            <br>
            <br>
            <label>
                (y) System Generated
                <br>
                <input type="number" id="generate_keys_elgamel_y" disabled>
            </label>
            <label>
                (k) System Generated
                <br>
                <input type="number" id="generate_keys_elgamel_k" disabled>
            </label>
            <br>

            <button>Calculate</button>
        </form>
    </section>

    <section>
        <h1>Encrypt (ElGamal)</h1>
        <p>Encoding: c1 = m*k mod(p) & c2= g.modPow(r,p)</p>

        <form action="javascript:Application.instance.encryptElGamel()">
            <label>
                (m) Message
                <br>
                <input type="number" id="encrypt_elgamel_m" required>
            </label>
            <br>
            <label>
                (c1) Encrypted Cipher Text 1 (System Generated)
                <br>
                <input type="number" disabled id="encrypt_elgamel_c1">
            </label>
            <br>
            <label>
                (c2) Encrypted Cipher Text 2 (System Generated)
                <br>
                <input type="number" disabled id="encrypt_elgamel_c2">
            </label>
            <br>
            <button>Encrypt Message</button>
        </form>
    </section>

    <section>
        <h1>Decrypt (ElGamal)</h1>
        <p>Decoding: k = c.ModPow(x,p) & inverse = k.modInv(p) & m = inverse*c2 mod(p)</p>

        <form action="javascript:Application.instance.decryptElGamel()">
            <label>
                (c1) Encrypted Cipher Text 1
                <br>
                <input type="number" id="decrypt_elgamel_c1" required>
            </label>
            <br>
            <label>
                (c2) Encrypted Cipher Text 2
                <br>
                <input type="number" required id="decrypt_elgamel_c2">
            </label>
            <br>
            <label>
                (m) Message (System Generated)
                <br>
                <input type="number" disabled id="decrypt_elgamel_m">
            </label>
            <br>
            <button>Decrypt Message</button>
        </form>
    </section>

</main>

<footer>
    <p>Created by Jack Harris 24/06/2022 for RMIT Security in Computing and Information Technology Assignment 1</p>
</footer>
<script src="https://cdn.jsdelivr.net/gh/peterolson/BigInteger.js@1.6.40/BigInteger.min.js"></script>

<script src="Application.js"></script>

</body>
</html>