package edu.unict.dmi.wsos.esami.Model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Esami {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long id;
    String nome;
    String professore;
    int cfu;

    public Esami() {
    }

    public Esami(long id, String nome, String professore, int cfu) {
        this.id = id;
        this.nome = nome;
        this.professore = professore;
        this.cfu = cfu;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getProfessore() {
        return professore;
    }

    public void setProfessore(String professore) {
        this.professore = professore;
    }

    public int getCfu() {
        return cfu;
    }

    public void setCfu(int cfu) {
        this.cfu = cfu;
    }

}
