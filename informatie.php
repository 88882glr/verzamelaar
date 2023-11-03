<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazonite</title>

    <?php include "./include/links.php" ?>

    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <navbar>
        <nav-left>
            <a href="./index.php" id="home"><i class="fa-solid fa-house"></i></a>
            <a href="./login.php"><i class="fa-solid fa-right-to-bracket"></i></a>
        </nav-left>
        <nav-right>
            <i id="basket" class="fa-solid fa-basket-shopping">
                <count></count>
            </i>
            <a href="./informatie.php" id="informatie"><i class="fa-solid fa-info"></i></a>
        </nav-right>
        <winkelmand>
            <winkelmand-items>
            </winkelmand-items>
            <totaal-prijs-box>
                <hr>
                <totaal-prijs></totaal-prijs>
                <form action="./db/db.php" method="post">
                    <input type="submit" name="submitCookies" value="Bestel">
                </form>
            </totaal-prijs-box>
        </winkelmand>
    </navbar>
    <main-box>
        <informatie-tekst>
            <h2>Over Amazonite</h2>
            <p>Op de schitterende wereld van kristallen en edelstenen is er een magische plek waar verzamelaars en
                liefhebbers
                samenkomen om hun passie te delen: de verzamelwebsite voor kristallen. Deze online bestemming is een
                ware
                schatkamer voor iedereen die gefascineerd is door de natuurlijke schoonheid en de energetische kracht
                van
                kristallen. Hier kun je niet alleen een uitgebreide verzameling kristallen ontdekken, maar ook de
                mogelijkheid
                krijgen om deze wonderlijke edelstenen te kopen en bewonderen.

                Een van de meest opvallende kenmerken van deze verzamelwebsite is de diversiteit aan kristallen die er
                te
                vinden
                is. Van de glinsterende pracht van heldere kwarts tot de diepe, mysterieuze kleuren van amethist, van de
                energieke uitstraling van citrien tot de beschermende eigenschappen van obsidiaan, er is voor iedere
                smaak
                en
                behoefte wel iets te vinden. Deze website is de plek waar je zeldzame en unieke kristallen kunt
                ontdekken
                die je
                misschien nergens anders kunt vinden.

                Naast de mogelijkheid om te kijken en te bewonderen, biedt deze website je de kans om kristallen aan te
                schaffen
                voor je eigen verzameling. Of je nu een doorgewinterde verzamelaar bent of gewoon op zoek bent naar een
                enkel
                speciaal stuk, er is voor elk budget en elke smaak wel iets te vinden. Het is een waar paradijs voor
                liefhebbers
                die op zoek zijn naar de perfecte kristal om hun collectie aan te vullen.

                De verzamelwebsite voor kristallen gaat echter verder dan alleen de aanschaf van deze prachtige
                edelstenen.
                Het
                is ook een plek waar je diepgaande informatie en educatieve bronnen kunt vinden over kristallen. Hier
                kun je
                leren over de geologie achter de vorming van kristallen, hun spirituele en helende eigenschappen, en hoe
                je
                ze
                kunt integreren in je dagelijks leven. Het is een waardevolle bron van kennis voor zowel beginners als
                ervaren
                verzamelaars.

                Daarnaast is deze website een bruisende gemeenschap van mensen die dezelfde passie delen. Je kunt
                deelnemen
                aan
                discussies, je eigen verzameling delen en zelfs tips en trucs uitwisselen met mede-verzamelaars. Het is
                een
                geweldige plek om nieuwe vrienden te maken en een diepgaande connectie te vinden met gelijkgestemden.

                Kortom, de verzamelwebsite voor kristallen is een magische online bestemming waar de schoonheid en
                kracht
                van
                kristallen samenkomen. Of je nu een fervent verzamelaar bent of gewoon nieuwsgierig bent naar de wereld
                van
                kristallen, deze website biedt een uitgebreide ervaring die zowel inspirerend als informatief is. Dus,
                duik
                in
                de schatkamer van kristallen en laat je betoveren door de wonderen van moeder natuur.</p>
            </tekst>
    </main-box>
</body>

</html>