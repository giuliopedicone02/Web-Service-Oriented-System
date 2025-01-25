package edu.unict.sanremo.Models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Brani {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String title;
    Integer durata;
    @ManyToOne
    @JoinColumn(name = "artisti_id")
    Artisti artistiId;

    public Brani() {
    }

    public Brani(Long id, String title, Integer durata, Artisti artistiId) {
        this.id = id;
        this.title = title;
        this.durata = durata;
        this.artistiId = artistiId;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public Integer getDurata() {
        return durata;
    }

    public void setDurata(Integer durata) {
        this.durata = durata;
    }

    public Artisti getArtistiId() {
        return artistiId;
    }

    public void setArtistiId(Artisti artistiId) {
        this.artistiId = artistiId;
    }

}
