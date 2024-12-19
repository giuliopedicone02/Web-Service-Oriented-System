package edu.unict.dmi.esami.esami.models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;
@Entity
@Table(name="esami")
public class Esame {
    

    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)


private int id;
private String nome;
private int voto;

    public Esame(int id, String nome, int voto) {
    this.id = id;
    this.nome = nome;
    this.voto = voto;
}

public Esame() {

}

    public int getVoto() {
        return voto;
    }

    public void setVoto(int voto) {
        this.voto = voto;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
}
