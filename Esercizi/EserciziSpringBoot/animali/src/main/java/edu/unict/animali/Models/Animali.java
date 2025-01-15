package edu.unict.animali.Models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Animali {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long id;
    String nome;
    String tipo;
    int eta;
    @ManyToOne
    @JoinColumn(name = "padroni_id")
    Padroni padroniId;

    public Animali() {
    }

    public Animali(long id, String nome, String tipo, int eta, Padroni padroniId) {
        this.id = id;
        this.nome = nome;
        this.tipo = tipo;
        this.eta = eta;
        this.padroniId = padroniId;
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

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public int getEta() {
        return eta;
    }

    public void setEta(int eta) {
        this.eta = eta;
    }

    public Padroni getPadroniId() {
        return padroniId;
    }

    public void setPadroniId(Padroni padroniId) {
        this.padroniId = padroniId;
    }

}
