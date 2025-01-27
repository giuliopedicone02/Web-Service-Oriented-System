package edu.unict.scuola.Models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Studenti {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String name;
    Integer age;
    @ManyToOne
    @JoinColumn(name = "classi_id")
    Classi classiId;

    public Studenti() {
    }

    public Studenti(Long id, String name, Integer age, Classi classiId) {
        this.id = id;
        this.name = name;
        this.age = age;
        this.classiId = classiId;
    }

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

    public Integer getAge() {
        return age;
    }

    public void setAge(Integer age) {
        this.age = age;
    }

    public Classi getClassiId() {
        return classiId;
    }

    public void setClassiId(Classi classiId) {
        this.classiId = classiId;
    }

}
