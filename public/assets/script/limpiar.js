jQuery(document).ready(function () {
    var lista = new Array("Soda Stream",
"Season Of Ligths II",
"Virgen de Guadalupe ",
"Star Pad Turbo",
"Innovator PRO 37",
"Amor de Cristal ",
"Color Tablets",
"Vaporeto",
"TV´s",
"Winter Sport",
"Invierno con Disney",
"Car Audio II",
"Winter Sport",
"Ceremonia Infantil",
"HPC Polo",
"Beats",
"Bolsas Cloe",
"Hush Puppies Hombre",
"Hush Puppies Mujer",
"Choose Your Dress",
"Calefactores ",
"Aeropostale",
"Blink Mujer",
"Fitness Station",
"Dulce Gusto",
"Blink Hombre",
"Cargando El Trineo",
"Puma Calzado",
"Puma Calzado",
"Puma Textil",
"Puma Textil",
"Office ClickOnero",
"El Taller de Santa",
"CAT",
"Xtil 21",
"Relojes Ferrari",
"Perfume Sale ",
"Adidas New Arrivals",
"As Seen On TV",
"Bésame",
"Perfume Sale",
"Tropicana",
"CAT hombre",
"Restonic Diciembre ");
    
     var limpios = "";
    
    for(var i=0; i<lista.length; i++){
        limpios += limpiar(lista[i]) + "<br/>";
    }
    
    console.log(limpios);
    
    
    function limpiar(cadena) {
        var arrChar = ["[á]", "[é]", "[í]", "[ó]", "[ú]", "[:]", "[ñ]", "[&]", "[!]", "[¡]", "[#]", "[?]", "[.]", "[¿]", "[ ]", "[+]", "[/]"];
        var arrReplace = ["a", "e", "i", "o", "u", "", "", "n", "", "", "", "", "", "", "", "", "", "", "", ""];
        
        for (var i = 0; i < arrChar.length; i++) {
            var re = new RegExp(arrChar[i], 'g');
            cadena = cadena.replace(re, arrReplace[i]);
        }
        return cadena;
    };
});