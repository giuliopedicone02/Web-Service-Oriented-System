package edu.unict.dmi.wsos.fifa.Repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.dmi.wsos.fifa.Models.Giocatori;

public interface GiocatoriRepository extends JpaRepository<Giocatori, Long> {

    Object findByNome(String search);

}
