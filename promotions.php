<?php

class promotion
{
	private $nom_promo;
	private $taux_promo;
	private $refp;
    private $date_debut;
    private $date_fin;
    private $etat;
	function __construct($a,$c,$d,$g,$h,$f)
	{
		$this->nom_promo=$a;
		$this->refp=$c;
        $this->taux_promo=$d;
        $this->date_debut=$g;
        $this->date_fin=$h;
        $this->etat=$f;
        
	}
	public function get_nom_promo()
	{
		return $this->nom_promo;
	}
	public function get_taux_promo()
	{
		return $this->taux_promo;
	}
	public function get_refp()
	{
		return $this->refp;
	}
	public function set_nom_promo($a)
	{
		 $this->nom_promo=$a;
	}
	public function set_taux_promo($d)
	{
		 $this->taux_promo=$d;
	}
	public function set_refp($c)
	{
		 $this->refp($c);
	}
    public function get_etat()
	{
		return $this->etat;
	}
	public function set_etat($f)
	{
		$this->etat=$f;
	}
    public function get_date_debut()
	{
		return $this->date_debut;
	}
	public function set_date_debut($g)
	{
		$this->date_debut=$g;
	}
    public function get_date_fin()
	{
		return $this->date_fin;
	}
	public function set_date_fin($h)
	{
		$this->date_fin=$h;
	}
    
}
?>