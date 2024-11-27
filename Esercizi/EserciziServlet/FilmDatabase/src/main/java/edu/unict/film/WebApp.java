package edu.unict.film;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/filmVV")
public class WebApp extends HttpServlet {

    Connection connection;
    static final String CONNECTION = "jdbc:mysql://localhost:3306/FilmDatabase?user=root&password=Giulio2002!";

    @Override
    public void init() {
        try {
            connection = DriverManager.getConnection(CONNECTION);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();

        out.println("""
                            <html>
                            <head></head>
                                <body>
                                    <center><h1>Catalogo Film</h1></center>
                """);
        String query = "SELECT * FROM Film";

        try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {
            out.println("<h2><b>Lista film disponibili : </b></h2>");
            while (result.next()) {
                out.println("<b> Nome Film : </b>" + result.getString("nome_film"));
                out.println("<b> Nome Regista : </b>" + result.getString("nome_regista"));

                int ds = result.getInt("anno_uscita");
                if (ds >= 2008) {

                    out.println("<b> Anno di Uscita : </b>" + "<span style = 'color:green' >" + ds + " </span>");

                } else {
                    out.println("<b> Anno di Uscita : </b>" + "<span style = 'color:red' >" + ds + " </span>");

                }

                out.println("<br>");
            }

            out.println("""
                        <h3> Aggiungere un nuovo film </h3>
                        <form action='/filmVV' method=post>
                        <input type='text' name='nome_film' placeholder='inserire nominativo film' required>
                        <input type='text' name='nome_regista' placeholder='inserire nominativo regista' required>
                        <input type='number' name='anno_uscita' placeholder='inserire anno uscita' required>
                        <input type='submit' name='richiesta' value="aggiungi">
                        </form>
                    """);

            out.println("""
                        <h3> Ricerca film : </h3>
                        <form action='/filmVV' method=post>
                        <input type='text' name='nome_film' placeholder='inserire nominativo film'>
                        <input type='text' name='nome_regista' placeholder='inserire nominativo regista'>
                        <input type='number' name='anno_uscita' placeholder='inserire anno uscita'>
                        <input type='submit' name='richiesta' value="ricerca">
                        </form>
                    """);

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();

        String richiesta = request.getParameter("richiesta");
        String query;

        if (richiesta.equals("aggiungi")) {
            String nome = request.getParameter("nome_film");
            String regista = request.getParameter("nome_regista");
            int anno = Integer.parseInt(request.getParameter("anno_uscita"));

            query = "INSERT INTO Film (nome_film,nome_regista,anno_uscita) VALUES (?,?,?)";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {

                stmt.setString(1, nome);
                stmt.setString(2, regista);
                stmt.setInt(3, anno);
                stmt.executeUpdate();

                out.println("""
                        <br>
                        Film aggiunto con successo
                        <a href='/filmVV'>Torna alla home!</a>
                                """);
            } catch (SQLException e) {

                e.printStackTrace();
            }
        }

        if (richiesta.equals("ricerca")) {
            String nome = request.getParameter("nome_film");
            String regista = request.getParameter("nome_regista");
            String anno_uscita = request.getParameter("anno_uscita");
            int anno = 0;
            if (!anno_uscita.equals("")) {
                anno = Integer.parseInt(anno_uscita);
            }

            query = "SELECT * FROM Film";
            boolean condizione = false;

            if (!nome.equals("")) {

                if (!condizione) {
                    query += " WHERE ";
                    condizione = true;
                } else {
                    query += " AND ";
                }
                query += "nome_film = '" + nome + "'";
            }

            if (!regista.equals("")) {
                if (!condizione) {
                    query += " WHERE ";
                    condizione = true;
                } else {
                    query += " AND ";
                }
                query += "nome_regista = '" + regista + "'";
            }

            if (anno > 0) {
                if (!condizione) {
                    query += " WHERE ";
                } else {
                    query += " AND ";
                }
                query += "anno_uscita = " + anno;
            }

            try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {

                out.println("<h2>Lista film disponibili:</h2>");
                boolean entra = false;
                while (result.next()) {
                    String nomeFilm = result.getString("nome_film");
                    String nomeRegista = result.getString("nome_regista");
                    int annoUscita = result.getInt("anno_uscita");
                    int id = result.getInt("id");
                    out.print("<form  action='/filmVV' method='post' >");
                    out.println("Nome Film: " + nomeFilm + "<br>");
                    out.println("Nome Regista: " + nomeRegista + "<br>");
                    out.println("Anno di Uscita: " + annoUscita + "<br>");
                    out.println("<input type='hidden' name='id' value='" + id + "' >");
                    out.println("<input type='submit' name= 'richiesta'value='modifica'>");
                    out.println("<input type='submit' name='richiesta'value='elimina'>  <br>");
                    out.print("</form>");
                    out.println("<br>");
                    entra = true;
                }

                if (!entra) {
                    out.println("Non ci sono film con questi parametri! <br>");
                }
                out.println("<a href='/filmVV'>Torna alla home!</a>");

            } catch (SQLException e) {

                e.printStackTrace();
            }
        }

        if (richiesta.equals("elimina")) {
            String idE = request.getParameter("id");

            String queryE = "DELETE FROM Film WHERE id = ?";

            try (
                    PreparedStatement stmt = connection.prepareStatement(queryE)) {

                stmt.setString(1, idE);
                stmt.executeUpdate();
                out.write("FILM ELIMINATO CON SUCCESSO ");

            } catch (SQLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }

            out.println("<a href='/filmVV'>Torna alla home!</a>");

        }

        if (richiesta.equals("modifica")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query2 = "SELECT * FROM Film WHERE id = ?";
            try (PreparedStatement stmt = connection.prepareStatement(query2)) {
                stmt.setInt(1, id);
                ResultSet result = stmt.executeQuery();

                if (result.next()) {
                    out.println("<form action='/filmVV' method='post'>");

                    out.println("<input type='hidden' name = 'id' value='" + id + "'>");

                    out.println("<span> Modifica nome film: </span>");
                    out.println("<input type='text' name='nome' value='" + result.getString("nome_film") + "'><br/>");
                    out.println("<span> Modifica nome regista: </span>");
                    out.println(
                            "<input type='text' name='regista' value='" + result.getString("nome_regista") + "'><br/>");
                    out.println("<span> Modifica anno: </span>");
                    out.println("<input type='number' name='anno' value='" + result.getInt("anno_uscita") + "'><br/>");
                    out.println("<input type='submit' name='richiesta' value='Update'><br/>");
                    out.println("</form>");
                }

            } catch (SQLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }

        if (richiesta.equals("Update")) {
            String nome_film = request.getParameter("nome");
            String nome_regista = request.getParameter("regista");
            int anno = Integer.parseInt(request.getParameter("anno"));
            int id = Integer.parseInt(request.getParameter("id"));

            String query2 = "UPDATE Film SET nome_film=?, nome_regista=?, anno_uscita=? WHERE id = ?";

            try (PreparedStatement stmt = connection.prepareStatement(query2)) {
                stmt.setString(1, nome_film);
                stmt.setString(2, nome_regista);
                stmt.setInt(3, anno);
                stmt.setInt(4, id);

                int rows = stmt.executeUpdate();
                out.println("Film modificato con successo, numero di righe modificate: " + rows + "<br>");
            } catch (SQLException e) {
                out.println("Errore, non è stato possibile modificare il film");
                e.printStackTrace();
            }

            out.println("<a href='/filmVV'>Torna alla home!</a>");

        }

    }

}