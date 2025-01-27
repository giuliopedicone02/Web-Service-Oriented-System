package edu.unict.scuola.Models;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Classi {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    Integer anno;
    String sezione;
    @OneToMany(mappedBy = "classiId", cascade = CascadeType.REMOVE)
    List<Studenti> studenti = new ArrayList<>();

    public Classi() {
    }

    public Classi(Long id, Integer anno, String sezione) {
        this.id = id;
        this.anno = anno;
        this.sezione = sezione;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Integer getAnno() {
        return anno;
    }

    public void setAnno(Integer anno) {
        this.anno = anno;
    }

    public String getSezione() {
        return sezione;
    }

    public void setSezione(String sezione) {
        this.sezione = sezione;
    }

}
