package edu.unict.palestra.Models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Iscritti {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String name;
    Integer age;
    Integer weight;
    @ManyToOne
    @JoinColumn(name = "palestra_id")
    Palestra palestraId;

    public Iscritti(Integer age, Long id, String name, Palestra palestraId, Integer weight) {
        this.age = age;
        this.id = id;
        this.name = name;
        this.palestraId = palestraId;
        this.weight = weight;
    }

    public Iscritti() {
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

    public Integer getWeight() {
        return weight;
    }

    public void setWeight(Integer weight) {
        this.weight = weight;
    }

    public Palestra getPalestraId() {
        return palestraId;
    }

    public void setPalestraId(Palestra palestraId) {
        this.palestraId = palestraId;
    }

}
