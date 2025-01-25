package edu.unict.sanremo.Models;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Artisti {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String name;
    int numeroAlbum;

    @OneToMany(mappedBy = "artistiId", cascade = CascadeType.REMOVE)
    List<Brani> brani = new ArrayList<>();

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public int getNumeroAlbum() {
        return numeroAlbum;
    }

    public void setNumeroAlbum(int numeroAlbum) {
        this.numeroAlbum = numeroAlbum;
    }

    public Artisti(Long id, String name, int numeroAlbum) {
        this.id = id;
        this.name = name;
        this.numeroAlbum = numeroAlbum;
    }

    public Artisti() {
    }

}
