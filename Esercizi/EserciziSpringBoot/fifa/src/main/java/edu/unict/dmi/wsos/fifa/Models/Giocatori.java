package edu.unict.dmi.wsos.fifa.Models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Giocatori {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long id;
    String nome;
    int numeroMaglia;
    @ManyToOne
    @JoinColumn(name = "squadra_id")
    Squadra squadraId;

    public Giocatori() {
    }

    public Giocatori(long id, String nome, int numeroMaglia, Squadra squadraId) {
        this.id = id;
        this.nome = nome;
        this.numeroMaglia = numeroMaglia;
        this.squadraId = squadraId;
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

    public int getNumeroMaglia() {
        return numeroMaglia;
    }

    public void setNumeroMaglia(int numeroMaglia) {
        this.numeroMaglia = numeroMaglia;
    }

    public Squadra getSquadraId() {
        return squadraId;
    }

    public void setSquadraId(Squadra squadraId) {
        this.squadraId = squadraId;
    }

}
