<?php


class adresa
{
    public $conn;

    /**
     * Konstruktor se připojí k DB
     */
    public function __construct()
    {
        include "db_asw.php";
        $dsn = "mysql:host=localhost;dbname=$dbname;port=3336";
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this->conn = new PDO($dsn, $user, $pass, $options);
    }

    /** Metoda vrací kraje z DB
     * @param int řazení krajů: 1 = dle kódku; 2 = dle názvu - výchozí
     * @return pole objektů kraj
     * @array
     */
    public function vratKraje($serad = 2)  //chybí-li parametr, dosadí 2
    {
        $stmt = $this->conn->prepare("SELECT kraj_kod, nazev FROM `kraj` ORDER BY :serad ASC;");
        $stmt->bindParam(':serad', $serad, PDO::PARAM_INT);  //filtruje a pustí jen číslo
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /** Metoda vrací Okresy konkrétního kraje z DB
     * @param int kraj_kod
     * @param int řazení okresů: 1 = dle kódku; 2 = dle názvu - výchozí
     * @return pole objektů okresů kraje
     * @array
     */
    public function vratOkresyKraje($kraj_kod, $serad = 2)  //chybí-li parametr, dosadí 2
    {
        $stmt = $this->conn->prepare("SELECT `okres_kod`, `nazev` FROM `okres` WHERE `kraj_kod` = :kraj_kod ORDER BY :serad ASC");
        $stmt->bindParam(':kraj_kod', $kraj_kod, PDO::PARAM_INT);  //filtruje na čísla
        $stmt->bindParam(':serad', $serad, PDO::PARAM_INT);  //filtruje a pustí jen číslo
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /** Metoda vrací Obce konkrétního okresu z DB
     * @param int okres_kod
     * @param int řazení obcí: 1 = dle kódku; 2 = dle názvu - výchozí
     * @return pole objektů obcí okresu
     * @array
     */
    public function vratObceOkresu($okres_kod, $serad = 2)  //chybí-li parametr, dosadí 2
    {
        $stmt = $this->conn->prepare("SELECT `obec_kod`, `nazev` FROM `obec` WHERE `okres_kod` = :okres_kod ORDER BY :serad ASC");
        $stmt->bindParam(':okres_kod', $okres_kod, PDO::PARAM_INT);  //filtruje na čísla
        $stmt->bindParam(':serad', $serad, PDO::PARAM_INT);  //filtruje a pustí jen číslo
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /** Metoda vrací Ulice konkrétních obcí z DB
     * @param int obec_kod
     * @param int řazení ulic: 1 = dle kódku; 2 = dle názvu - výchozí
     * @return pole objektů obcí okresu
     * @array
     */
    public function vratUliceObci($obec_kod, $serad = 2)  //chybí-li parametr, dosadí 2
    {
        $stmt = $this->conn->prepare("SELECT `ulice_kod`, `nazev` FROM `ulice` WHERE `obec_kod` = :obec_kod ORDER BY :serad ASC");
        $stmt->bindParam(':obec_kod', $obec_kod, PDO::PARAM_INT);  //filtruje na čísla
        $stmt->bindParam(':serad', $serad, PDO::PARAM_INT);  //filtruje a pustí jen číslo
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function vratNazevKraje($kraj_kod)
    {
        $stmt = $this->conn->prepare("SELECT `nazev` FROM `kraj` WHERE `kraj_kod` = :kraj_kod");
        $stmt->bindParam(':kraj_kod', $kraj_kod, PDO::PARAM_INT);  //filtruje na čísla
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ)[0]->nazev;
    }

    public function vratNazevOkresu($okres_kod)
    {
        $stmt = $this->conn->prepare("SELECT `nazev` FROM `okres` WHERE `okres_kod` = :okres_kod");
        $stmt->bindParam(':okres_kod', $okres_kod, PDO::PARAM_INT);  //filtruje na čísla
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ)[0]->nazev;
    }

    public function vratNazevObce($obec_kod)
    {
        $stmt = $this->conn->prepare("SELECT `nazev` FROM `obec` WHERE `obec_kod` = :obec_kod");
        $stmt->bindParam(':obec_kod', $obec_kod, PDO::PARAM_INT);  //filtruje na čísla
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ)[0]->nazev;
    }

    public function vratNazevUlice($ulice_kod)
    {
        $stmt = $this->conn->prepare("SELECT `nazev` FROM `ulice` WHERE `ulice_kod` = :ulice_kod");
        $stmt->bindParam(':ulice_kod', $ulice_kod, PDO::PARAM_INT);  //filtruje na čísla
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ)[0]->nazev;
    }
}