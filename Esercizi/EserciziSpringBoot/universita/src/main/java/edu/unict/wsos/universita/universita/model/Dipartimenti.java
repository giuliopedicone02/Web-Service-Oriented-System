package edu.unict.wsos.universita.universita.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "Corsi")
public class Dipartimenti {
    @Id
    @GeneratedValue
    private long id_dipartimento;
    private String nome;
    private String edificio;
    private String telefono;

    public Dipartimenti() {
    }

    public Dipartimenti(long id_dipartimento, String nome, String edificio, String telefono) {
        this.id_dipartimento = id_dipartimento;
        this.nome = nome;
        this.edificio = edificio;
        this.telefono = telefono;
    }

    public long getId_dipartimento() {
        return id_dipartimento;
    }

    public void setId_dipartimento(long id_dipartimento) {
        this.id_dipartimento = id_dipartimento;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getEdificio() {
        return edificio;
    }

    public void setEdificio(String edificio) {
        this.edificio = edificio;
    }

    public String getTelefono() {
        return telefono;
    }

    public void setTelefono(String telefono) {
        this.telefono = telefono;
    }

}
