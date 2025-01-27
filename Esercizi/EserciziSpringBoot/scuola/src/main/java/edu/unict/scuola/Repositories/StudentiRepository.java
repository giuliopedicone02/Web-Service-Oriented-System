package edu.unict.scuola.Repositories;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.scuola.Models.Classi;
import edu.unict.scuola.Models.Studenti;

public interface StudentiRepository extends JpaRepository<Studenti, Long> {
    List<Studenti> findByClassiId(Classi classiId);
}
