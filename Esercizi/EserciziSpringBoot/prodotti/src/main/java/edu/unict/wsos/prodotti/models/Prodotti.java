package edu.unict.wsos.prodotti.models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name = "Prodotti")
public class Prodotti {
    @Id
    @GeneratedValue
    private long id;
    private String nome_prodotto;
    private int prezzo_prodotto;

    public Prodotti() {
    }

    public Prodotti(long id, String nome_prodotto, int prezzo_prodotto) {
        this.id = id;
        this.nome_prodotto = nome_prodotto;
        this.prezzo_prodotto = prezzo_prodotto;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getNome_prodotto() {
        return nome_prodotto;
    }

    public void setNome_prodotto(String nome_prodotto) {
        this.nome_prodotto = nome_prodotto;
    }

    public int getPrezzo_prodotto() {
        return prezzo_prodotto;
    }

    public void setPrezzo_prodotto(int prezzo_prodotto) {
        this.prezzo_prodotto = prezzo_prodotto;
    }

}
