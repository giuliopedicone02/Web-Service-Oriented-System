package edu.unict.palestra.Repositories;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.palestra.Models.Iscritti;
import edu.unict.palestra.Models.Palestra;

public interface IscrittiRepsoitory extends JpaRepository<Iscritti, Long> {
    List<Iscritti> findByPalestraId(Palestra palestraId);
}
