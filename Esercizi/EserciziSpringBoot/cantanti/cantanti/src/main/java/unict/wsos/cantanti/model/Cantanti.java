package unict.wsos.cantanti.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Cantanti {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String nome;
    boolean sanremo;
    @ManyToOne
    @JoinColumn(name = "genere_id")
    Genere genereId;

    public Cantanti() {
    }

    public Cantanti(Long id, String nome, boolean sanremo, Genere genereId) {
        this.id = id;
        this.nome = nome;
        this.sanremo = sanremo;
        this.genereId = genereId;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public boolean isSanremo() {
        return sanremo;
    }

    public void setSanremo(boolean sanremo) {
        this.sanremo = sanremo;
    }

    public Genere getGenereId() {
        return genereId;
    }

    public void setGenereId(Genere genereId) {
        this.genereId = genereId;
    }

}
