package model;

import javax.persistence.*;

/**
 * Represents the comment type from the database
 *
 * @author Daniel Modliba
 * @version 2018-06-05
 */
@Entity
public class Comment {

    @Id
    @GeneratedValue(strategy = GenerationType.SEQUENCE)
    private long id;

    @ManyToOne
    private User author;

    private String text;

    public Comment(User author, String text) {
        this.author = author;
        this.text = text;
    }

    public long getId() {
        return id;
    }

    public User getAuthor() {
        return author;
    }

    public void setAuthor(User author) {
        this.author = author;
    }

    public String getText() {
        return text;
    }

    public void setText(String text) {
        this.text = text;
    }

}
