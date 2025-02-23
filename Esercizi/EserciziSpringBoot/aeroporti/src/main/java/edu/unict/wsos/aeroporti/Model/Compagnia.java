package edu.unict.wsos.aeroporti.Model;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Compagnia {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String descrizione;
    String link;
    @OneToMany(mappedBy = "compagniaId", cascade = CascadeType.REMOVE)
    List<Tratta> tratte = new ArrayList<>();

    public Compagnia() {
    }

    public Compagnia(Long id, String descrizione, String link) {
        this.id = id;
        this.descrizione = descrizione;
        this.link = link;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getDescrizione() {
        return descrizione;
    }

    public void setDescrizione(String descrizione) {
        this.descrizione = descrizione;
    }

    public String getLink() {
        return link;
    }

    public void setLink(String link) {
        this.link = link;
    }

}
