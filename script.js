document.addEventListener('DOMContentLoaded', function(){
    const postButton = document.getElementById('post');
    const getButton = document.getElementById('get');
    const putButton = document.getElementById('put');
    const deleteButton = document.getElementById('delete');
    const pizzakForm = document.getElementById('vevokForm');
    const pizzaLista = document.getElementById('VevőkLista');

    //'post' gomb eseménykezelője
    postButton.addEventListener('click', async function(){
        let BaseURL = "http://localhost/pizzaugyfelekapi/index.php?vevo";

        //Űrlap adatainak gyűjtése
        const formData = new FormData(document.getElementById('vevokForm'));
        let options = {
            method: 'POST',
            mode: "no-cors",
            body: formData
        };
        let response = await fetch(BaseURL, options);
        if(response.ok){
            console.log("Sikeres adatfelvétel");
        } else {
            console.log("Hiba a szerver válaszában");
        }
    });

    //'get' gomb eseménykezelője
    getButton.addEventListener('click', async function(){
        //Űrlap elrejtése, lista megjelenítése
        pizzakForm.classList.add('d-none');
        pizzaLista.classList.remove('d-none');
        let BaseURL = "http://localhost/pizzaugyfelekapi/index.php?vevo";
        let options = {
            method: 'GET',
            mode: "cors"
        };
        let response = await fetch(BaseURL, options);
        if (response.ok) {
            let data = await response.json();
            vevokListazasa(data);
        } else {
            console.error('Hiba a szerver válaszában');
        };
    });

    //'update' gomb eseménykezelője
    putButton.addEventListener('click', async function () {
        let baseUrl = "http://localhost/pizzaugyfelekapi/index.php?vevo/{id}";
        //Űrlap adatainak gyűjtése
        const formData = new FormData(document.getElementById('vevokForm'));
        let options = {
            method: 'PUT',
            mode: "no-cors",
            body: formData
        };
        let response = await fetch(baseUrl, options);
        if (response.ok) {
            console.log("Sikeres adatmódosítás");
        } else {
            console.error('Hiba a szerver válaszában');
        }
    });

    //'delete' gomb eseménykezelője
    deleteButton.addEventListener('click', async function () {
        let baseUrl = "http://localhost/pizzaugyfelekapi/index.php?vevo/{id}";
        //Űrlap adatainak gyűjtése
        const formData = new FormData(document.getElementById('vevokForm'));
        let options = {
            method: 'DELETE',
            mode: "no-cors",
            body: formData
        };
        let response = await fetch(baseUrl, options);
        if (response.ok) {
            console.log("Sikeres törlés");
        } else {
            console.error('Hiba a szerver válaszában');
        }
    });

    //Vevők kilistázása
    function vevokListazasa(vevok){
        let tablazat = vevoFejlec();
        for (let vevo of vevok) {
            tablazat += vevoSor(vevo);
        }
        VevőkLista.innerHTML = tablazat + "</tbody></table>";
    }

    //Vevő sor
    function vevoSor(vevo){
        let sor = `<tr>
            <td>${vevo.vazon}</td>
            <td>${vevo.vnev}</td>
            <td>${vevo.vcim}</td>
            <td><button type="button" class="btn btn-outline-info" onclick="adatBetoltes(${vevo.vazon})"><i class="fa-regular fa-hand-point-left"></i></button></td>
        </tr>`;
    }

    //Vevő fejléc
    function vevoFejlec(){
        let fejlec = `<table class="table table-striped">
                <thead>
                    <tr>
                        <th>Azonosító:</th>
                        <th>Név:</th>
                        <th>Cím:</th>
                    </tr>
                </thead>
                <tbody>`;
        return fejlec;
    }
});