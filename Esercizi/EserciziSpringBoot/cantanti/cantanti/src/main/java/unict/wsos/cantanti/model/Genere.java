package unict.wsos.cantanti.model;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Genere {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long id;
    String nome;
    @OneToMany(mappedBy = "genereId", cascade = CascadeType.REMOVE)
    List<Cantanti> cantanti = new ArrayList<>();

    public Genere(long id, String nome, List<Cantanti> cantanti) {
        this.id = id;
        this.nome = nome;
        this.cantanti = cantanti;
    }

    public Genere() {
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

    public List<Cantanti> getCantanti() {
        return cantanti;
    }

    public void setCantanti(List<Cantanti> cantanti) {
        this.cantanti = cantanti;
    }

}
