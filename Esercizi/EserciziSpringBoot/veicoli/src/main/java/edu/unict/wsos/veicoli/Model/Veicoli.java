package edu.unict.wsos.veicoli.Model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "veicoli")
public class Veicoli {
    @Id
    @GeneratedValue
    Long id;
    String marca;
    String modello;
    int prezzo;

    public Veicoli() {
    }

    public Veicoli(Long id, String marca, String modello, int prezzo) {
        this.id = id;
        this.marca = marca;
        this.modello = modello;
        this.prezzo = prezzo;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getMarca() {
        return marca;
    }

    public void setMarca(String marca) {
        this.marca = marca;
    }

    public String getModello() {
        return modello;
    }

    public void setModello(String modello) {
        this.modello = modello;
    }

    public int getPrezzo() {
        return prezzo;
    }

    public void setPrezzo(int prezzo) {
        this.prezzo = prezzo;
    }

}
