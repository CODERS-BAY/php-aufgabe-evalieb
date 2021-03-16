#php_aufgabe - bis 26. März 2021

## Erstelle eine Webseite + Datenbank für eine Firma wo sich Mitarbeiter einloggen können

### Mitarbeiter haben einen Usernamen, einen Vor und Nachnamen, Rechte, ein Bild, ein Team und eine Email Adresse
-->EL: zusätzlich wurde noch eine ID vergeben (wie kann ich einen Datensatz ohne ID löschen - hab es nicht geschafft)

### Rechte: Admin, Teamleiter oder Mitarbeiter 
-->admin, lead und employee

### Mitarbeiter können ihr eigenes Profil updaten
!TODO Foto hochladen, austauschen, //TO ASK Passwort ändern?? 

### Teamleiter darf zusätzlich Mitarbeiter aus seinem Team herausnehmen oder bestehende Mitarbeiter in seine Gruppe hinzufügen (ein Mitarbeiter kann immer nur in einem Team sein)
## der Mitarbeiter muss vorher frei von einem Team sein, damit ihn ein anderer Teamleiter in sein Team aufnehmen kann

# Überlege dir einen Teamnamen und gestalte die Webseite (Farben / Hintergrund) je nach Team

# Admin darf alle Mitarbeiter löschen, verändern und neue Mitarbeiter anlegen
## EL:die Zuteilung zu einem Team erfolgt aber durch einen Leader!
--> das würde aber nicht funktionieren, da der lead auch einem Team vorher zugeteilt werden muss!! 
## Fotos können nur vom MA selbst hinzugefügt werden

<!-- # Löscht ein Admin einen Mitarbeiter, so wird dieser per Mail darüber informiert -->

# Wenn man angemeldet ist sieht man
## Seinen Namen, sein Bild und den Profiländerungsbutton
## Man kann sich ausloggen
## Auf der Startseite sieht man zusätzlich in welchem Team man sich befindet.

## Alle Änderungen (außer beim Login nicht zwingend) werden mit Ajax realisiert,damit der User immer auf einer Seite bleibt

## Team intern können Nachrichten versendet werden
--> immer an alle vom Team, oder auch an einzelne Personen? 
#### Annahme EL: die Nachrichten bleiben auch nach löschen bzw. Teamwechsel eines MA im jeweiligen Team(zum Zeitpunkt des Verfassens der Nachricht) bestehen
## Diese scheinen dann auf der Startseite auf
## Nur der Teamleiter hat die Möglichkeit diese Nachrichten auch zu löschen