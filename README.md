#php_aufgabe - bis 26. März 2021

## Erstelle eine Webseite + Datenbank für eine Firma wo sich Mitarbeiter einloggen können

### Mitarbeiter haben einen Usernamen, einen Vor und Nachnamen, Rechte, ein Bild, ein Team und eine Email Adresse
-->EL: zusätzlich wurde noch eine ID vergeben (wie kann ich einen Datensatz ohne ID löschen - hab es nicht geschafft)

### Rechte: Admin, Teamleiter oder Mitarbeiter 
-->admin, lead und employee  -->done

### Mitarbeiter können ihr eigenes Profil updaten
Foto hochladen, austauschen --> allerdings kann nur 1 Foto gespeichert werden  
 Passwort ändern?? -->done

### Teamleiter darf zusätzlich Mitarbeiter aus seinem Team herausnehmen oder bestehende Mitarbeiter in seine Gruppe hinzufügen (ein Mitarbeiter kann immer nur in einem Team sein)
--> der Teamleiter sieht seine MA und alle freien MA
-->done
### der Mitarbeiter muss vorher frei von einem Team sein, damit ihn ein anderer Teamleiter in sein Team aufnehmen kann
--> done

### Überlege dir einen Teamnamen und gestalte die Webseite (Farben / Hintergrund) je nach Team
--> done

### Admin darf alle Mitarbeiter löschen (-->done), verändern(-->done 
<!-- AUSSER: PWD ändern -->
) und neue Mitarbeiter (-->done) anlegen
### EL: Fotos können nur vom MA selbst hinzugefügt werden

<!-- # Löscht ein Admin einen Mitarbeiter, so wird dieser per Mail darüber informiert -->

# Wenn man angemeldet ist sieht man
--> done
## Seinen Namen
-->done, 
## sein Bild 
-->done
## und den Profiländerungsbutton
-->done
## Man kann sich ausloggen
--> done
## Auf der Startseite sieht man zusätzlich in welchem Team man sich befindet.
--> done

## Alle Änderungen (außer beim Login nicht zwingend) werden mit Ajax realisiert,damit der User immer auf einer Seite bleibt

### Team intern können Nachrichten versendet werden
--> immer an alle vom Team, oder auch an einzelne Personen? 
#### Annahme EL: die Nachrichten bleiben auch nach löschen bzw. Teamwechsel eines MA im jeweiligen Team(zum Zeitpunkt des Verfassens der Nachricht) bestehen
## Diese scheinen dann auf der Startseite auf
--> done
## Nur der Teamleiter hat die Möglichkeit diese Nachrichten auch zu löschen
--> done