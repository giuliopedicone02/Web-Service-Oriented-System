package edu.wsos;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;

import jakarta.persistence.EntityManager;
import jakarta.persistence.EntityManagerFactory;
import jakarta.persistence.EntityTransaction;
import jakarta.persistence.Persistence;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/wsos")
public class wsos extends HttpServlet {

    EntityManager em;

    public void init(){
        EntityManagerFactory emf=Persistence.createEntityManagerFactory("default");
        em = emf.createEntityManager();
    }

    private void getListOfStudents(PrintWriter out){
        // Get the list of students
        List<student> student=em.
                createQuery("select s from student s", student.class).
                getResultList();

       for (student s: student) {
           out.write("<p>"+s.getName()+"("+s.getAge()+") - <a href='/wsos?id="+s.getId()+"'>Edit</a></p>");
       }
    }

    private student getStudent(Integer id){
        /* return(em.
        createQuery("select s from student s where id=:id", student.class).
        setParameter("id", id)
        .getSingleResult()); */
        return(em.find(student.class, id));
 }

    private void printForm(PrintWriter out, student s) {
        out.write("<h1> Create/Edit a student </h1>");
        String form="";
        form+="<form action='#' method='POST'>";
        form+="<input type='text' name='name' value='" + (s != null ?s.getName():"name") + "'/>";
        form+="<input type='number' name='age' value='" + (s != null ?s.getAge():"18") + "'/>";
        if (s != null) form+="<input type='hidden' name='name' value='" + s.getId() + "'/>";
        if (s != null) form+="<input type='submit' name='action' value='delete'/>";
        form+="<input type='submit' name='action' value='edit'/>";
        form+="</form>";
        out.write(form);
    }

    private void startHtml(PrintWriter out){
        String starthtml="""
                <html>
                    <body>
                        <h1> WSOS <h1>
                """;
        out.write(starthtml);
    }

    private void closeHtml(PrintWriter out){
        String endhtml="""
            </body></html>
            """;
        out.write(endhtml);
    }

    private int getId(String idParam){
        int id=-1;
        try {
            if (idParam != null) {
                id = Integer.parseInt(idParam);
            }
        } catch (NumberFormatException e) {
            id = -2;
        }
        return(id);
    }
    private void deleteStudent(Integer id){

    }
    public void doGet(HttpServletRequest request,HttpServletResponse response) {
        response.setContentType("text/html");
        PrintWriter out=null;
        try {
            out=response.getWriter();
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

        startHtml(out);

        Integer id = getId(request.getParameter("id"));

        if (id > 0) {
            student s = getStudent(id); // Get id from db
            printForm(out, s); // Print the form with s
        } else {
            getListOfStudents(out); // Get the full list
            printForm(out, null); // Print an empty form
        }
      
        closeHtml(out);

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) {
        student s=null;
        // Get parameters from form
        String name=request.getParameter("name");
        int age=Integer.parseInt(request.getParameter("age"));
        int id = getId(request.getParameter("id"));
        String action=request.getParameter("action");

        System.out.println("Id is "+id);
        s = new student();
        if (id >0 ) s.setId(Long.valueOf(id));

        s.setName(name);
        s.setAge(age);

        EntityTransaction transaction=em.getTransaction();
        transaction.begin();
        if (action.equals("delete")) {
            student sdel = em.find(student.class, id);
            em.remove(sdel);
        } else if (action.equals("edit")) {
            em.merge(s); // Merge
        }
        transaction.commit();
        try {
            response.sendRedirect("/wsos");
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    
        
    }

}
