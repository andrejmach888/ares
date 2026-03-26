# ARES & Iterator — Laravel Project

## Úloha 1 — Iterator (FizzBuzz)

### Algoritmus

Príkaz iteruje čísla od **1 do 100** a pre každé číslo vypisuje:

| Podmienka | Výstup |
|---|---|
| Deliteľné 15 (teda 3 aj 5) | `SuperFaktura` |
| Deliteľné 5 | `Faktura` |
| Deliteľné 3 | `Super` |
| Inak | samotné číslo |

Kód algoritmu sa nachádza v:
```
app/Console/Commands/IteratorCommand.php
```

### Spustenie

```bash
php artisan app:iterator
```

---

## Úloha 3 — ARES ekonomické subjekty

### Popis

Príkaz sa opýta na IČO, zavolá verejné ARES API (`ares.gov.cz`), výsledok namapuje do typovaných DTO objektov, uloží do cache (platí do konca aktuálneho dňa) a vypíše IČO a obchodné meno subjektu.

### Architektúra

```
config/ares.php                              # base URL pre ARES API

app/
├── Console/Commands/
│   └── FetchEconomicEntity.php             # artisan príkaz
├── Dto/Ares/
│   ├── SubjektDto.php                      # koreňový DTO
│   ├── SidloDto.php
│   ├── AdresaDorucovaciDto.php
│   ├── SeznamRegistraciDto.php
│   ├── ObchodniJmenoDto.php
│   ├── SidloZaznamDto.php
│   ├── DalsiUdajeDto.php
│   └── CzNaceDto.php
├── Exceptions/Api/
│   ├── ApiException.php                    # base HTTP exception (statusCode + rawBody)
│   ├── ClientException.php                 # 4xx chyby
│   ├── ServerException.php                 # 5xx chyby
│   └── ConnectionException.php            # sieťové / iné chyby
├── Http/Clients/
│   ├── ApiClient.php                       # abstraktný base HTTP klient (Guzzle)
│   └── Ares/
│       └── AresEconomicEntitiesClient.php  # GET /ekonomicke-subjekty/{ico}
└── Services/Ares/
    └── AresService.php                     # cache + mapovanie na SubjektDto
```

### Spustenie

```bash
php artisan ares:fetch-economic-entity
```

Príkaz sa interaktívne opýta na IČO (8 číslic) a vypíše výsledok:

```
 ──────────── ────────────────────────────
  IČO          Obchodné meno
 ──────────── ────────────────────────────
  01569651     Superfaktura.cz, s.r.o.
 ──────────── ────────────────────────────
```

### Error handling

| Situácia | Exception | Popis |
|---|---|---|
| 400 Bad Request | `ClientException` | Neplatný formát IČO |
| 404 Not Found | `ClientException` | Subjekt neexistuje |
| 5xx | `ServerException` | Chyba na strane ARES |
| Timeout / DNS / iné | `ConnectionException` | Sieťová chyba |

### Cache

Výsledky sú cachované do **konca aktuálneho dňa** (polnoc). Kľúč cache je odvodený od názvu metódy a IČO, takže každý subjekt má vlastný záznam.

---

## Inštalácia a spustenie projektu

### Požiadavky

- PHP 8.3+
- Composer
- Node.js + npm

### Postup

```bash
# 1. Nainštalovať závislosti
composer install
npm install

# 2. Pripraviť environment
cp .env.example .env
php artisan key:generate

# 3. Spustiť migrácie
php artisan migrate

# 4. Zostaviť frontend assets
npm run build
```
