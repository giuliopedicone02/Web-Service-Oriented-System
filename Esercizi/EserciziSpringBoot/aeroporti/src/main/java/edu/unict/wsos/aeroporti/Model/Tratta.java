package edu.unict.wsos.aeroporti.Model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Tratta {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String origine;
    String destinazione;
    Integer distanza;
    @ManyToOne
    @JoinColumn(name = "compagnia_id")
    Compagnia compagniaId;

    public Tratta() {
    }

    public Tratta(Long id, String origine, String destinazione, Integer distanza, Compagnia compagniaId) {
        this.id = id;
        this.origine = origine;
        this.destinazione = destinazione;
        this.distanza = distanza;
        this.compagniaId = compagniaId;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getOrigine() {
        return origine;
    }

    public void setOrigine(String origine) {
        this.origine = origine;
    }

    public String getDestinazione() {
        return destinazione;
    }

    public void setDestinazione(String destinazione) {
        this.destinazione = destinazione;
    }

    public Integer getDistanza() {
        return distanza;
    }

    public void setDistanza(Integer distanza) {
        this.distanza = distanza;
    }

    public Compagnia getCompagniaId() {
        return compagniaId;
    }

    public void setCompagniaId(Compagnia compagniaId) {
        this.compagniaId = compagniaId;
    }

}
